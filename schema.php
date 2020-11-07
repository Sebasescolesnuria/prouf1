<?php 

function insertItems(PDO $db, string $email, string $user, string $password, int $role){
    $cost = ['cost' => 4];
    $password = password_hash($password, PASSWORD_BCRYPT, $cost);
    $command2 = "
    INSERT INTO users (email,uname,passw,role) VALUES ('$email','$user','$password',$role)";
    try{
        $db -> exec($command2);
        return true;
    }catch(PDOException $e){
        return false;
        die($e -> getMessage());
    }
}

function insertTasks(PDO $db, string $description, string $date, string $user):bool{
    try{   
        $stmt=$db->prepare('SELECT * FROM users WHERE uname=:uname LIMIT 1');
        $stmt->execute([':uname'=>$user]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);  
        $array = $row[0];
        $id = $array['id'];
        $stmt2=$db->prepare("
        INSERT INTO tasks (description,user,due_date) VALUES (:description,$id,'$date')");
        $stmt2->execute([':description'=>$description]);
        return true;
    }catch(PDOException $e){
        return false;
        die($e -> getMessage());
    }
}

function deleteTasks(PDO $db, string $description, string $user):bool{
    try{
        $stmt=$db->prepare('SELECT * FROM users WHERE uname=:uname LIMIT 1');
        $stmt->execute([':uname'=>$user]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);  
        $array = $row[0];
        $id = $array['id'];
        $stmt2=$db->prepare("
        DELETE FROM tasks WHERE user = $id AND description = :description");
        $stmt2->execute([':description'=>$description]);
        return true;
    }catch(PDOException $e){
        return false;
        die($e -> getMessage());
    }
}

function tasks(PDO $db, string $user, array &$idlist, array &$descriptionlist, array &$due_datelist, int &$count2):bool{
    try{   
        $stmt=$db->prepare('SELECT * FROM users WHERE uname=:uname LIMIT 1');
        $stmt->execute([':uname'=>$user]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);  
        $array = $row[0];
        $id = $array['id'];
        $stmt2=$db->prepare('SELECT * FROM tasks WHERE user=:user');
        $stmt2->execute([':user'=>$id]);
        $count2=$stmt2->rowCount();
        $row2=$stmt2->fetchAll(PDO::FETCH_ASSOC); 
        $count2 = count($row2);
        //echo $count2.'<br>';
        if ($count2 != 0){
            $i = 0;
            while($i < $count2){
                $array2 = $row2[$i];
                foreach ($array2 as $valor => $value) {
                    if ($valor == 'id'){
                        $idlist[] = $value;
                    }
                    if ($valor == 'description'){
                        $descriptionlist[] = $value;
                    } 
                    if ($valor == 'due_date'){
                        $due_datelist[] = $value;
                    }
                }
                $i++;
            }
            return true;           
        }
        else{
            return false;
        }
    }catch(PDOException $e){
        return false;
        die($e -> getMessage());
    }
}

function tasks_items(PDO $db, string $user, array &$descriptionti, array &$completedti, int $id_ti, int &$count2):bool{
    try{   
        $stmt2=$db->prepare('SELECT * FROM task_item WHERE task=:task');
        $stmt2->execute([':task'=>$id_ti]);
        $count2=$stmt2->rowCount();
        $row2=$stmt2->fetchAll(PDO::FETCH_ASSOC); 
        $count2 = count($row2);
        if ($count2 != 0){
            $i = 0;
            while($i < $count2){
                $array2 = $row2[$i];
                foreach ($array2 as $valor => $value) {
                    if ($valor == 'id'){
                        $idti[] = $value;
                    }
                    if ($valor == 'item'){
                        $descriptionti[] = $value;
                    } 
                    if ($valor == 'completed'){
                        $completedti[] = $value;
                    }
                }
                $i++;
            }
            return true;           
        }
        else{
            return false;
        }
    }catch(PDOException $e){
        return false;
        die($e -> getMessage());
    }
}

function auth(PDO $db, string $email, string $password):bool{
    try{   
        $stmt=$db->prepare('SELECT * FROM users WHERE email=:email LIMIT 1');
        $stmt->execute([':email'=>$email]);
        $count=$stmt->rowCount();
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);  
        
        if($count == 1){       
            $array = $row[0];
            $res = password_verify($password,$array['passw']);
           
            if ($res){
                $_SESSION['uname'] = $array['uname'];
                $_SESSION['email'] = $array['email'];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }catch(PDOException $e){
        return false;
        die($e -> getMessage());
    }
}
?>
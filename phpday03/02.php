<?php
    $arr_final=[];
    $data=file_get_contents("names.txt");
    // print_r($data);
    $arr = explode("\n",$data);
    // print_r($arr);
    foreach($arr as $key=>$value){
        $newArr=explode("|",$value);
        // print_r($newArr);
        $arr_final[]=$newArr;
    }
    // print_r($arr_final);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>age</td>
                <td>email</td>
                <td>address</td>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($arr_final as $key=>$value){ ?>
                <tr>
                    <?php foreach($value as $key1=>$value1){ ?>
                        <td>
                            <?php echo $value1; ?>
                        </td>
                    <?php } ?>
                </tr>
                
        <?php } ?>


        
        
        </tbody>
    </table>
</body>
</html>
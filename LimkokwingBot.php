<?php
/**
 * Created by PhpStorm.
 * User: Amirtechs
 * Date: 11/02/2021
 * Time: 04:15PM
 */
require_once 'config.php';
define('API_KEY','XXXXXXXXXXXX'); //Token
$db = mysqli_connect('localhost:XXXXX','XXXXX','XXXXX~S','XXXX');

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot" .API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)) {
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$input = file_get_contents('php://input');
file_put_contents("result.txt",$input.PHP_EOL.PHP_EOL,FILE_APPEND);



if (isset($update->message)) {
    //Fetching update
    $message = $update->message;
    $message_id = $update->message->message_id;
    $text = $message->text;
    $chat_id = $message->chat->id;
    $var = explode(" ",$text);


    //Start of Limkokwing Bot
    if ($text == '/start') {
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Welcome to LimkokwingBot. 🦅
Click /help to see all the commands of LimkokwingBot.",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Help Guideline
    } elseif ($var[0] == '/help') {
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❓ Insert or click the commands below to start. \n
/faculty - List of Faculty
/examresult - List of Result \n
@LimkokwingBotNews - Join this channel to subscribe newsletter about LimkokwingBot.",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //List of Faculty
    } elseif ($var[0] == '/faculty') {
        $sql = "SELECT faculty_code, faculty_name FROM faculty";
        $result = $conn->query($sql);
        $faculty = " ";
        $remove_keyboard = array("remove_keyboard" => true);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $faculty .= $row["faculty_code"] . " - " . $row["faculty_name"] .  " \n";
            }
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $faculty,
                'reply_markup' => json_encode($remove_keyboard)
            ]);
        }

        //Get Student Name
    } elseif ($var[0]== '/student') {
        $sql = "SELECT student_name FROM student_info";
        $result = $conn->query($sql);
        $student = " ";
        $remove_keyboard = array("remove_keyboard" => true);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student .= $row["student_name"] . " \n";
            }
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $student,
                'reply_markup' => json_encode($remove_keyboard)
            ]);
        }

        //Check exam result by selecting user's faculty
    } elseif ($var[0] == '/examresult') {
        $reply = "Please choose your faculty";

        //keyboard 3 Data each Row
        $keyboard = [
            "keyboard" => [
                [["text" => "Faculty of Information & Communication Technology", "selective" => true]],
                [['text' => "Faculty of Architecture & The Built Environment", "selective" => true]],
                [['text' => "Faculty of Business Management & Globalization", "selective" => true]],
                [["text" => "Faculty of Communication, Media & Broadcasting", "selective" => true]],
                [['text' => "Faculty of Design Innovation", "selective" => true]],
                [['text' => "Faculty of Fashion & Lifestyle Creativity", "selective" => true]],
                [["text" => "Faculty of Multimedia Creativity", "selective" => true]],
                [['text' => "Limkokwing Sound & Music Design Academy", "selective" => true]],
                [['text' => "Postgraduate Centre", "selective" => true]]
            ],
            "one_time_keyboard" => true, "resize_keyboard" => true];
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "$reply",
            'reply_markup' => json_encode($keyboard)
        ]);

        //Faculty of Information & Communication Technology
    }elseif ($text == "Faculty of Information & Communication Technology"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Please insert your student ID. \n\n💡 Please use this format:
/result student_ID",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Faculty of Fashion & Lifestyle Creativity
    } elseif ($text == "Faculty of Fashion & Lifestyle Creativity"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Faculty of Architecture & The Built Environment
    }elseif ($text == "Faculty of Architecture & The Built Environment"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Faculty of Business Management & Globalization
    } elseif ($text == "Faculty of Business Management & Globalization"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Please insert your student ID. \n\n💡 Please use this format:
/result student_ID",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Faculty of Communication, Media & Broadcasting
    } elseif ($text == "Faculty of Communication, Media & Broadcasting"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Faculty of Design Innovation
    } elseif ($text == "Faculty of Design Innovation"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Faculty of Multimedia Creativity
    } elseif ($text == "Faculty of Multimedia Creativity"){
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Limkokwing Sound & Music Design Academy
    }elseif ($text == "Limkokwing Sound & Music Design Academy") {
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Postgraduate Centre
    }elseif ($text == "Postgraduate Centre") {
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Coming Soon!",
            'reply_markup' => json_encode($remove_keyboard)
        ]);

        //Result Checking From Database
    }elseif ($var[0] == '/result' && $var[1]) {
        $remove_keyboard = array("remove_keyboard" => true);
        $sql = "SELECT student_name, student_id, course_name, term, cgpa, module_code_1, module_name_1, grade_1,
            module_code_2, module_name_2, grade_2, module_code_3, module_name_3, grade_3, module_code_4,module_name_4, grade_4,
            module_code_5, module_name_5, grade_5, module_code_6, module_name_6, grade_6 FROM student_info WHERE student_id=". $var[1];
        $result = $conn->query($sql);
        $student = " ";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = "Name: " . $row["student_name"]. "\n" .
                    "Student ID: " . $row["student_id"] . "\n" . "Program: " . $row["course_name"] . "\n" .
                    "Term: " . $row["term"] . "\n" . "CGPA: " . $row["cgpa"]. "\n\n" .
                    "" . $row["module_code_1"] . " - " . "" . $row["module_name_1"]. " (" . "" . $row["grade_1"] . ")" . "\n" .
                    "" . $row["module_code_2"] . " - " . "" . $row["module_name_2"]. " (" . "" . $row["grade_2"] . ")" . "\n" .
                    "" . $row["module_code_3"] . " - " . "" . $row["module_name_3"]. " (" . "" . $row["grade_3"] . ")" . "\n" .
                    "" . $row["module_code_4"] . " - " . "" . $row["module_name_4"]. " (" . "" . $row["grade_4"] . ")" . "\n" .
                    "" . $row["module_code_5"] . " - " . "" . $row["module_name_5"]. " (" . "" . $row["grade_5"] . ")" . "\n" .
                    "" . $row["module_code_6"] . " - " . "" . $row["module_name_6"]. " (" . "" . $row["grade_6"] . ")" . "\n\n" .
                    "- End of Results -"
                ;
            }
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $student,
                'reply_markup' => json_encode($remove_keyboard)
            ]);
        }
        elseif ($var[0] == '/result' || $var[1]){
            $remove_keyboard = array("remove_keyboard" => true);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "⚠   Error. Your student ID is not valid. Please contact your administrator. Thank you.",
                'reply_markup' => json_encode($remove_keyboard)
            ]);
        }

        //Return Error Result
    } else {
        $remove_keyboard = array("remove_keyboard" => true);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⚠️  Error. Please contact your administrator. Thank you.",
            'reply_markup' => json_encode($remove_keyboard)
        ]);
    }
}
<?php
function main() {
    try {
        echo convertFromHundredToThousand("magana mbiri") . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

function convertFromHundredToThousand($number) {
    $numArray = explode(" ", $number);
    if (strpos($number, "gana") !== false) {
        switch (count($numArray)) {
            case 1:
                return 100;
            case 3:
                $tens = $numArray[2];
                $output = "1" . convertStringToNumbers($tens);
                return (int)$output;
            case 4:
                $lastNo = $numArray[2] . " " . $numArray[3] . " ";
                $output = "1" . convertStringToNumbers($lastNo);
                return (int)$output;
            default:
                $lastNo = $numArray[2] . " " . $numArray[3] . " " . $numArray[4] . " " . $numArray[5];
                $output = "1" . convertStringToNumbers($lastNo);
                return (int)$output;
        }
    } elseif (strpos($number, "magana") !== false) {
        switch (count($numArray)) {
            case 2:
                return (int)convertToNumber(trim($numArray[1])) . "00";
            case 4:
                return (int)convertToNumber(trim($numArray[1])) . "10";
            case 6:
                $tenths = $numArray[3] . " " . $numArray[4] . " " . $numArray[5];
                $no = (int)(convertToNumber($numArray[1]) . convertStringToNumbers($tenths));
                return $no;
            case 7:
                $tenths = $numArray[3] . " " . $numArray[4] . " " . $numArray[5] . " " . $numArray[6];
                $no = (int)(convertToNumber($numArray[1]) . convertStringToNumbers($tenths));
                return $no;
            default:
                return 401;
        }
    } else {
        return convertStringToNumbers($number);
    }
}

function convertStringToNumbers($number) {
    $input = trim($number);
    if ($input === "humi") {
        return 10;
    } elseif (strpos($number, "humi") !== false) {
        $lastNo = explode(" ", $number)[2];
        $numbers = "1" . convertToNumber($lastNo);
        return (int)$numbers;
    } elseif (strpos($number, "mirongo") !== false) {
        $numArray = explode(" ", $number);
        if (count($numArray) === 4) {
            $tenthNo = $numArray[1];
            $lastNo = $numArray[3];
            $output = convertToNumber($tenthNo) . convertToNumber($lastNo);
            return (int)$output;
        } else {
            $tenthNo = $numArray[1];
            $output = convertToNumber($tenthNo) . "0";
            return (int)$output;
        }
    } else {
        return convertToNumber($number);
    }
}

function convertToNumber($number) {
    $numbers = [
        "",
        "mwega",
        "mbiri",
        "tahu",
        "inne",
        "tsano",
        "andahu",
        "saba",
        "nane",
        "chenda"
    ];

    $index = array_search($number, $numbers);
    if ($index !== false) {
        return $index;
    } else {
        throw new Exception("Language not understood");
    }
}

main();

?>

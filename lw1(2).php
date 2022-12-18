<?php
class Date {
    private int $day, $month, $year;
    public static array $Week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    public function __construct(int $day, int $month, int $year) {
        if ($day >= 1 && $day <= 31) {
            $this->day = $day;
        } else {
            $this->day = 1;
        }
        if ($month >= 1 && $month <= 12) {
            $this->month = $month;
        } else {
            $this->month = 1;
        }
        if ($year >= 1 && $year <= 3000) {
            $this->year = $year;
        } else {
            $this->year = 1;
        }
    }

    public function raznicaDney(Date $dateTwo): void {
        $dateOneSum = $dateTwoSum = $raznica = 0;
        $dateOneSum = ($this->year * 365) + ($this->month * 31) + $this->day;
        $dateTwoSum = ($dateTwo->year * 365) + ($dateTwo->month * 31) + $dateTwo->day;
        $raznica = $dateOneSum - $dateTwoSum;
        if ($raznica < 0) {
            $raznica = $raznica * (-1);
            echo "$raznica" . "\n";
        } else {
            echo "$raznica" . "\n";
        }
    }

    public function minusDay(int $remove) {
        $this->day = $this->day - $remove;
        while ($this->day < 1) {
            $this->month--;
            $this->day = $this->day + 31;
        }
        while ($this->month < 1) {
            $this->year--;
            $this->month = $this->month + 12;
        }
        $this->RUEN('RUS');
    }

    public function getWeek(): void {
        $dateSum = $dateName = 0;
        $dateSum = ($this->year * 365) + ($this->month * 31) + $this->day;
        $dateName = $dateSum % 7;
        echo self::$Week[$dateName] . "\n";
    }

    public function RUEN(string $choise): void {
        switch ($choise) {
            case 'RUS':
                echo "$this->day.$this->month.$this->year \n";
                break;
            case 'ENG':
                echo "$this->year-$this->month-$this->day \n";
                break;
            default:
                echo "ne tot \n";
        }
    }
}

$date = new Date(1, 2, 2001);
$date2 = new Date(1, 4, 2001);
$date->raznicaDney($date2);
$date->minusDay(4);
$date->getWeek();
$date->RUEN('RUS');
$date->RUEN('ENG');
<?php

class CCalendar {
    private $weeks = array();

    public function getValues(){
        if(isset($_GET['year']) && isset($_GET['month'])){
            $this->setYear($_GET['year'])->setMonth($_GET['month']);
        } else {
            $this->setYear(date('Y'))->setMonth(date('m'));
        }
    }

    public function getWeeks()
    {
        return $this->weeks;
    }
    private $month;
    private $year;

    public function prev(){
      $year = $this->year;
      $month = $this->month;

       // Hantera månaden här
        if($month == 1){
            $month = 12;
          	$year--; //då tänkte jag rätt :) sen lika dant på next fast tvärt om.. så ska den ju funka ja :P
        } else {
            $month--;
        }

      return ["year" => $year, "month"=>$month];
    }
    public function next(){
      $year = $this->year;
        $month = $this->month;
          if($month == 12){
              $month = 1;
              $year++;
          } else {
              $month++;
          }
        return ["year" => $year, "month"=>$month];
    }
    public function addWeek($week)
    {
        $this->weeks[] = $week;
    }

    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }

    public function getMonthNumber(){
        $dateString = strtotime(sprintf('%s-%s-01', $this->year, $this->month));
        return $month = date('m', $dateString);
    }
    public function getMonthName(){
        $dateString = strtotime(sprintf('%s-%s-01', $this->year, $this->month));
        return $month = date('F', $dateString);
    }

    public function setYear($year){
        $this->year = $year;
        return $this;
    }

    public function generateCalenderData(){
        $daysUsed = 0;
        $dateString = strtotime(sprintf('%s-%s-01', $this->year, $this->month));
        $monthDays = date('t', $dateString);
        $dayOfWeek = date('w', $dateString);
        $firstWeek = new CWeek();
        $emptyDays = $this->getAmountOfEmptyDays($dayOfWeek);
        for($i = 1; $i<=$emptyDays; $i++){
            $firstWeek->addWeekday(new CDay());
        }

        for($i = 1; $i<=7-$emptyDays;$i++){
            $dateString = strtotime(sprintf('%s-%s-%s', $this->year, $this->month, $i));
            $day = new CDay();
            $day->setName(date('l', $dateString));
            $day->setDayOfMonthNumber($i);
            $firstWeek->addWeekday($day);
            $daysUsed ++;
        }

        $this->addWeek($firstWeek);
        $week = null;

        for($date = $daysUsed+1;$date<=$monthDays;$date++){
            $dateString = strtotime(sprintf('%s-%s-%s', $this->year, $this->month, $date));
            $dayOfWeek = date('w', $dateString);
            if($dayOfWeek == 1){
                if($week){
                    $this->addWeek($week);
                }
                $week = new CWeek();
            }

            $day = new CDay();
            $day->setName(date('l', $dateString));
            $day->setDayOfMonthNumber($date);
            $week->addWeekday($day);

        }
        $extraDays = 7-$week->getLengthOfDayArray();

        for($i = 0;$i<$extraDays;$i++){
            $week->addWeekday(new CDay());
        }
        $this->addWeek($week);

    }


    private function getAmountOfEmptyDays($firstDayOfMonth){
        $number = 0;
        if($firstDayOfMonth == 0){
            $number = 6;
        } else {
            $number = $firstDayOfMonth -1;
        }
        return $number;
    }

    public function printCalendar(){
        $img = $this->month;
        $prevData = $this->prev();
        $nextData = $this->next();
        $html = "<div class='headerCalendar'>
                    <img class='img' src='./img/calender/" .$img . ".jpg'>
                    <p class='year'> $this->year</p><p class='month'>" . $this->getMonthName() . "</p>

                 </div>
                 <div class='leftArrow'> <a href='?month=". $prevData["month"] ."&year=" . $prevData["year"] . "'><img src='./img/orangeArrow.png'></a></div>
                 <div class='rightArrow'> <a href='?month=". $nextData["month"] ."&year=" . $nextData["year"] . "'><img src='./img/orangeArrow.png'></a></div>
                 <div>
                 <table class='bordered'>";




        foreach($this -> getWeeks() as $week){
            $html .= "<tr>";
            foreach($week -> getWeekdays() as $day){
                $currentDay = $day->getName();
                $todaysDay = date('j');
                $currentMonth = date('m');
                $html .= "<td>";

                if($currentDay == "Sunday"){
                    $html .= "<div class='redNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                    $html .= "<div class='redName'>" . $day->getName() . "</div>";
                } else {
                    if($day->getDayOfMonthNumber() == $todaysDay && $this->month == $currentMonth) {
                        $html .= "<div class='current'><div class='monthNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                        $html .= "<div class='monthName'>" . $day->getName() . "</div></div>";
                    } else {
                        if($this->month == 12 && $day->getDayOfMonthNumber() == 24){
                            $html .= "<div class='christmas'><div class='monthNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                            $html .= "<div class='monthName'>" . $day->getName() . "</div></div>";
                        } else {
                            $html .= "<div class='monthNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                            $html .= "<div class='monthName'>" . $day->getName() . "</div>";
                        }
                    }
                }
                $html .= "</td>";
            }
            $html .= "</tr>";
        }

        $html .= "</table></div>";
        return $html;
    }

    public function printMiniCalendar(){
        $img = $this->month;
        $prevData = $this->prev();
        $nextData = $this->next();
        $html = "
                 <div class='leftArrow'> <a href='?month=". $prevData["month"] ."&year=" . $prevData["year"] . "'><img src='./img/orangeArrow.png'></a></div>
                 <div class='rightArrow'> <a href='?month=". $nextData["month"] ."&year=" . $nextData["year"] . "'><img src='./img/orangeArrow.png'></a></div>
                 <div class='bordered'>
                 <table>";




        foreach($this -> getWeeks() as $week){
            $html .= "<tr>";
            foreach($week -> getWeekdays() as $day){
                $currentDay = $day->getName();
                $todaysDay = date('j');
                $currentMonth = date('m');
                $html .= "<td>";

                if($currentDay == "Sunday"){
                    $html .= "<div class='redNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                } else {
                    if($day->getDayOfMonthNumber() == $todaysDay && $this->month == $currentMonth) {
                        $html .= "<div class='current'><div class='monthNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                    } else {
                        if($this->month == 12 && $day->getDayOfMonthNumber() == 24){
                            $html .= "<div class='christmas'><div class='monthNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                        } else {
                            $html .= "<div class='monthNumber'>" . $day->getDayOfMonthNumber() . "</div>";
                        }
                    }
                }
                $html .= "</td>";
            }
            $html .= "</tr>";
        }

        $html .= "</table></div>";
        return $html;
    }

}

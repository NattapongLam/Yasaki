<?php 
namespace App\Helpers;


class Helper 
{
    protected static $month_th_long = [
        1   => "มกราคม",
        2   => "กุมภาพันธ์",
        3   => "มีนาคม",
        4   => "เมษายน",
        5   => "พฤษภาคม",
        6   => "มิถุนายน",
        7   => "กรกฎาคม",
        8   => "สิงหาคม",
        9   => "กันยายน",
        10  => "ตุลาคม",
        11  => "พฤศจิกายน",
        12  => "ธันวาคม"
    ];

    protected static $month_th_short = [
        1   => "ม.ค.",
        2   => "ก.พ.",
        3   => "มี.ค.",
        4   => "เม.ย.",
        5   => "พ.ค.",
        6   => "มิ.ย.",
        7   => "ก.ค.",
        8   => "ส.ค.",
        9   => "ก.ย.",
        10  => "ต.ค.",
        11  => "พ.ย.",
        12  => "ธ.ค."
    ];


    public static function dateThaiShotMonth($date_m){
        $day_s = date('d',strtotime($date_m));
        $month_s = date('n',strtotime($date_m));
        $year_s = date('Y',strtotime($date_m)) + 543;

        $month_v = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];

        return $day_s.' '.$month_v[$month_s].' '.$year_s;
    }


    public static function monthThaiShort($strMonth)
    {

        return self::$month_th_short[$strMonth];
    }

    public static function monthThaiLong($strMonth)
    {
        return self::$month_th_long[$strMonth];
    }
}



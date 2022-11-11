<?php

if (! function_exists('moneyFormat')) {
    function moneyFormat($amount)
    {
        return '$' . number_format($amount, 2);
    }
}

if (! function_exists('format_tags')) {
    function format_tags($tags)
    {
        return "".trim($tags).",";
    }
}

if (! function_exists('format_datetime')) {
    function format_datetime($a) {
		$month = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		$split = explode(" ", $a);
		$date = explode("-", $split[0]);
		$format_date = $date[2].' '.$month[$date[1]].' '.$date[0];
		return $format_date.', '.$split[1];
	}
}

if (! function_exists('format_date')) {
    function format_date($a) {
		$month = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		$date = explode("-", $a);
		$format_date = $date[2].' '.$month[$date[1]].' '.$date[0];
		return $format_date;
	}
}

if (! function_exists('format_chart')) {
    function format_chart($a) {
		$month = [
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'Mei',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Aug',
			'09' => 'Sept',
			'10' => 'Okt',
			'11' => 'Nov',
			'12' => 'Des',
		];
		$date = explode("-", $a);
		$format_date = $date[2].' '.$month[$date[1]];
		return $format_date;
	}
}

if (! function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'tahun',
	        'm' => 'bulan',
	        'w' => 'minggu',
	        'd' => 'hari',
	        'h' => 'jam',
	        'i' => 'menit',
	        's' => 'detik',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
	}
}

if (! function_exists('status_info')) {
    function status_info($i) {
		if ($i == 'Low') {
			$color = 'info';
		} elseif ($i == 'Inprogress') {
			$color = 'primary';
		} elseif ($i == 'High') {
			$color = 'danger';
		} elseif ($i == 'Medium') {
			$color = 'warning';
        } elseif ($i == 'Pending') {
			$color = 'warning';
        } elseif ($i == 'Completed') {
			$color = 'success';
		} else {
			$color = 'secondary';
		}
		return '<span class="badge text-bg-'.$color.'">'.strtoupper($i).'</span>';
	}
}

if (! function_exists('platform')) {
    function platform($i) {
		if ($i == 'Twitter') {
			$color = 'info';
		} elseif ($i == 'Facebook') {
			$color = 'primary';
		} elseif ($i == 'Youtube') {
			$color = 'danger';
		} elseif ($i == 'Whatsapp') {
			$color = 'success';
        } elseif ($i == 'Tiktok') {
			$color = 'secondary';
		} elseif ($i == 'Instagram') {
			$color = 'danger';
        } elseif ($i == 'Telegram') {
			$color = 'secondary';
		} else {
			$color = 'secondary';
		}
		return $color;
	}
}

if (!function_exists('currency')) {
    function currency($value){    
        $currency = number_format($value, 0, ".", ".");
        return $currency;
    }
}

if (!function_exists('lowercase')) {
    function lowercase($value){    
        return strtolower($value);
    }
}

if (!function_exists('convert_date')) {
    function convert_date($value){    
		$convert = str_replace('/"', '-', $value);  
        return date("Y-m-d H:i:s", strtotime($convert)); 
    }
}
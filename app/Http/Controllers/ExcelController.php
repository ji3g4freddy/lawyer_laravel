<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
    public function personalExport()
    {

    	Excel::create('個人時數統計報表', function($excel) {
    		$excel->sheet('Sheet 1', function($sheet) {

    			$tasks = Task::join('users','tasks.user_id','=','users.id')
                    ->select('tasks.*')
                    ->get();

                  	foreach($tasks as $task) {
	                 	$data[] = array(
	                    $task->date,
	                    $task->category,
	                    $task->description,
	                    $task->hour,
	                	);
    				}
					$sheet->setFontSize(15)->fromArray($data, null, 'A1', false, false);
					$headings = array('日期', '工作項目', '工作說明', '工作時數','是否請款');
					$sheet->prependRow(1, $headings);

    		});

    	})->export('xls');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| MIME TYPES
| -------------------------------------------------------------------
| This file contains an array of mime types. It is used by the
| Upload class to help identify allowed file types.
|
*/
return array(
	'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain'),
	'pdf'	=>	array('application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream'),
	'xls'	=>	array('application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword'),
	'ppt'	=>	array('application/powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.ms-office', 'application/msword'),
	'pptx'	=> 	array('application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/x-zip', 'application/zip'),
	'tar'	=>	'application/x-tar',
	'tgz'	=>	array('application/x-tar', 'application/x-gzip-compressed'),
	'zip'	=>	array('application/x-zip', 'application/zip', 'application/x-zip-compressed', 'application/s-compressed', 'multipart/x-zip'),
	'rar'	=>	array('application/x-rar', 'application/rar', 'application/x-rar-compressed'),
	'jpeg'	=>	array('image/jpeg', 'image/pjpeg'),
	'jpg'	=>	array('image/jpeg', 'image/pjpeg'),
	'png'	=>	array('image/png', 'image/x-png'),
	'doc'	=>	array('application/msword', 'application/vnd.ms-office'),
	'docx'	=>	array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip', 'application/msword', 'application/x-zip'),
	'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip'),
	'xl'	=>	'application/excel',
	'json'  =>	array('application/json', 'text/json'),
);

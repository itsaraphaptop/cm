<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install_report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('file');
	}
	public function install() {
		//error_reporting(0);
		$key = $this->input->post('code');
		$path_report = "stimulsoft/Flex/reports/";
		$controllers = get_filenames($path_report);
		$patt = '/<ConnectionStringEncrypted[^>]*>([\s\S\n]*?)<\/ConnectionStringEncrypted>/i';
		$replacement = '<ConnectionStringEncrypted>' . $key . '</ConnectionStringEncrypted>';

		$num_file_true = 0;
		$num_file_false = 0;
		foreach ($controllers as $key => $file_name) {

			$path_file = $path_report . $file_name;
			$content_file = read_file($path_file);

			$results_match = preg_match($patt, $content_file, $matches, PREG_OFFSET_CAPTURE, 0);
			if ($results_match > 0) {

				$new_content = preg_replace($patt, $replacement, $content_file);
				//clear val $content_file
				unset($content_file);
				if (substr_count($new_content, "</ConnectionStringEncrypted>") > 1) {
					$new_content = preg_replace('/<\/ConnectionStringEncrypted>/i', '', $new_content, 1);
				}

				if (!!write_file($path_file, $new_content)) {
					echo date('Y-m-d H:i:s') . " installed file {$file_name} <span style='color: #5ced80'>[TRUE]</span>";
					$num_file_true++;
				} else {
					echo date('Y-m-d H:i:s') . " installed file {$file_name} <span style='color: ##ed3d52'>[FALSE]</span>";
					$num_file_false++;
				}
				echo "<br>";
				//clear val $new_content
				unset($new_content);
			}
		}
		echo "results = File written {$num_file_true} file";

	}
	public function installjs() {
		//error_reporting(0);
		$key = $this->input->post('code');
		
		$path_report = "stimulsoft/JS/reports/";
		$controllers = get_filenames($path_report);

		$patt = '/"ConnectionStringEncrypted[^>]*":([\s\S\n]*?)"}},/i';
		$replacement = '"ConnectionStringEncrypted":"' . $key . '"}},';

		$num_file_true = 0;
		$num_file_false = 0;
		foreach ($controllers as $key => $file_name) {

			$path_file = $path_report . $file_name;
			$content_file = read_file($path_file);
		
			$results_match = preg_match($patt, $content_file, $matches, PREG_OFFSET_CAPTURE, 0);
			if ($results_match > 0) {

				$new_content = preg_replace($patt, $replacement, $content_file);
			
				//clear val $content_file
				// unset($content_file);
				if (substr_count($new_content, '"}},') > 1) {
					$new_content = preg_replace('/"}},/i', '', $new_content, 1);
				}
				if (!!write_file($path_file, $new_content)) {
					echo date('Y-m-d H:i:s') . " installed file {$file_name} <span style='color: #5ced80'>[TRUE]</span>";
					$num_file_true++;
				} else {
					echo date('Y-m-d H:i:s') . " installed file {$file_name} <span style='color: ##ed3d52'>[FALSE]</span>";
					$num_file_false++;
				}
				echo "<br>";
				//clear val $new_content
				// unset($new_content);
			}
		}
		echo "results = File written {$num_file_true} file";

	}

}

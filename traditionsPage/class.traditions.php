<?php

require_once 'db_pdo.php';

class traditions {
	static $PDO = NULL;

	static function getPDO(){
		global $PDO;
		try {
                	$PDO = new PDO(K_CONNECTION_STRING, K_USERNAME, K_PASSWORD);
                	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                return $PDO;
        	} catch (Exception $ex) {
                	return $ex->getMessage();
        	}
	}

	static function createTable(){
        	self::getPDO();
		global $PDO;
		$sql = <<<EOD
                	CREATE TABLE IF NOT EXISTS traditions (
                        	name VARCHAR(100) NOT NULL,
	                        description VARCHAR(10000) NOT NULL,
				points INT NOT NULL
			);
EOD;
	        $res = $PDO->exec($sql);
	}

	static function loadTheTraditions(){
		self::getPDO();
		global $PDO;

		$NUM = 2;
        	$sql = 'SELECT COUNT(*) FROM traditions';
	        $res = $PDO->query($sql);
        	$res->execute();
	        $count = $res->fetchColumn();

		if($count < $NUM){
        	        $sql = <<<EOD
                	        INSERT INTO traditions (name, description, points) VALUES
				('Big Blue Madness', 'Go to BBM and watch our incredible basketball team show off there pre season skills', '3'),
				('Learn the Fight Song', 'Memorize the word to the Universitys fight song and sing it loud for all to hear', '1');
EOD;
                	$res = $PDO->exec($sql);
		}
	}


	static function getTraditionsInfo(){
		self::getPDO();
		global $PDO;
		$table = <<<EOD
                        <table>
                        <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Point Value</th>
                        </tr>
EOD;

	        $sql = 'SELECT * FROM traditions';
        	$res = $PDO->query($sql);
	        $data = $res->fetchAll();
        	foreach ($data as $key => $traditions) {
                	$name = $traditions['name'];
			$description= $traditions['description'];
			$points = $traditions['points'];

			$table .=
                        	"<tr>
		                        <td>$name</td>
					<td>$description</td>
                                	<td>$points</td>
                	        </tr>";

		}
		$table .= '</table>';

		return $table;
	}

}

<?php

namespace BiNet\App\Support;

class Pager {
	const SHOW_ALL = 0;

	private $noItems;
	private $noPages;
	private $page;
	private $pageSize;

	public function setPageSize($pageSize) {
		$this->pageSize = $pageSize;
	}

	public function setNoItems($noItems) {
		$this->noItems = $noItems;
	}

	public function __get($property) {
		return $this->$property;
	}


}
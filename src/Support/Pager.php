<?php

namespace BiNet\App\Support;

class Pager {
	const SHOW_ALL = 0;
	const PAGE_SIZE = 20;

	private $noItems;
	private $page;
	private $pageSize;

	public function __construct() {
		$page = 1;
		$pageSize = PAGE_SIZE;
	}

	public function setNoItems($noItems) {
		if ($noItems >= 0) {
			$this->noItems = $noItems;	
		}
	}

	public function setPage($page) {
		if ($page > 0) {
			$this->$page = $page;
		}
	}

	public function setPageSize($pageSize) {
		if ($pageSize == SHOW_ALL || $pageSize > 0) {
			$this->pageSize = $pageSize;
		}
	}

	public function __get($property) {
		return $this->$property;
	}

	public function getNoPages() {
		if ($this->pageSize == SHOW_ALL) {
			return 1;
		}
		return ceil($this->noItems / $this->pageSize);
	}
}
<?php

namespace BiNet\App\Support;

use BiNet\App\Support\Traits\AccessorTrait;

class Pager {
	use AccessorTrait;

	const SHOW_ALL = 0;
	const DEFAULT_PAGE_SIZE = 20;

	private $noItems;
	private $page;
	private $pageSize;

	public function __construct() {
		$this->page = 1;
		$this->pageSize = self::DEFAULT_PAGE_SIZE;
		$this->noItems = 0;
	}

	public function setNoItems($noItems) {
		if ($noItems >= 0) {
			$this->noItems = $noItems;	
		}
	}

	public function setPage($page) {
		if ($page > 0) {
			$this->page = $page;
		}
	}

	public function setPageSize($pageSize) {
		if ($pageSize == self::SHOW_ALL || $pageSize > 0) {
			$this->pageSize = $pageSize;
		}
	}

	public function getNoPages() {
		if ($this->pageSize == self::SHOW_ALL) {
			return 1;
		}
		return ceil($this->noItems / $this->pageSize);
	}

	public function getStartNo() {
		if ($this->noItems == 0) {
			return 0;
		}

		return ($this->page-1) * $this->pageSize + 1;
	}

	public function getLastNo() {
		$last = $this->page * $this->pageSize - 1;

		return $last < $this->noItems ? $last : $this->noItems;
	}
}
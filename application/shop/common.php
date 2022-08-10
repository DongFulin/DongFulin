<?php
	/**
	 * 添加后台日志
	 * @param $log 操作类型
	 * @param $tables 操作数据表
	 * @param $opid 操作主键ID
	 */
	function ys_admin_logs($log,$tables,$opid)
	{
		return \app\admin\controller\AdminLog::add($log,$tables,$opid);
	}
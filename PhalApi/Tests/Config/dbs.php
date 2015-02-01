<?php
/**
 * 分库分表的自定义数据库路由配置
 * 
 * @author: dogstar
 */

return array(
    /**
     * DB数据库服务器集群
     */
    'servers' => array(
        /**
        'db_demo' => array(
            'host'      => 'localhost',             //数据库域名
            'name'      => 'test',                  //数据库名字
            'user'      => 'root',                  //数据库用户名
            'password'  => '123456',	            //数据库密码
            'port'      => '3306',		            //数据库端口
        ),
         */
    ),

    /**
     * 自定义路由表
     */
    'tables' => array(
        /**
        '__default__' => array(
            'prefix' => 'tbl_',
            'key' => 'id',
            'map' => array(
                array('db' => 'db_demo'),
                array('start' => 0, 'end' => 2, 'db' => 'db_demo'),
            ),
        ),
        'demo' => array(
            'prefix' => 'tbl_',
            'key' => 'id',
            'map' => array(
                array('db' => 'db_demo'),
                array('start' => 0, 'end' => 2, 'db' => 'db_demo'),
            ),
        ),
         */
    ),
);

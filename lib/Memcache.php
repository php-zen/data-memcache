<?php
/**
 * 定义 Memcache 组件。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 SZen.in
 * @license   LGPL-3.0+
 */

namespace Zen\Data\Memcache;

use Zen\Core;

/**
 * Memcache 组件。
 *
 * @package Zen\Data\Memcache
 * @version 0.1.0
 * @since   0.1.0
 */
class Memcache extends Core\Component
{
    /**
     * 链接到服务端。
     *
     * @param  string  $id      链接编号。
     * @param  array[] $servres 可选。服务器列表。
     * @return self
     * @throws ExNoneServer     当数据端未配置时
     */
    final public static function connect($id, $servers = array())
    {
        $o_mc = new Memcached($id);
        $a_servers = $o_mc->getServerList();
        if (empty($a_servers)) {
            if (empty($servers)) {
                throw new ExNoneServer;
            }
            $o_mc->addServers($servers);
            $o_mc->setOptions(array(
                    Memcached::OPT_PREFIX_KEY => $id,
                    Memcached::OPT_DISTRIBUTION => Memcached::DISTRIBUTION_CONSISTENT,
                    Memcached::OPT_LIBKETAMA_COMPATIBLE => true,
                    Memcached::OPT_NO_BLOCK => true,
                    Memcached::OPT_TCP_NODELAY => true
                )
            );
        } else if (!empty($servers)) {
            throw new ExConnExists;
        }
        return $o_mc;
    }
}

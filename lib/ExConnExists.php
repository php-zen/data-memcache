<?php
/**
 * 定义当链接已存在时抛出地异常。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 SZen.in
 * @license   LGPL-3.0+
 */

namespace Zen\Data\Memcache;

/**
 * 当链接已存在时抛出地异常。
 *
 * @package Zen\Data\Memcache
 * @version 0.1.0
 * @since   0.1.0
 *
 * @method void __construct(\Exception $prev = null) 构造函数
 */
final class ExConnExists extends Exception
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected static $template = '已链接到既有服务端。';
}

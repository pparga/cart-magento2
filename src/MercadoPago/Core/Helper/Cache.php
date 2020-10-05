<?php

namespace MercadoPago\Core\Helper;

/**
 * Class Cache
 * @package MercadoPago\Core\Helper
 */
class Cache
{
    const PREFIX_KEY = 'MP_';

    /**
     * @var \Magento\Framework\App\CacheInterface
     */
    protected $_cacheManager;

    /**
     * Cache constructor.
     * @param \Magento\Framework\View\Element\Context $context
     */
    public function __construct(\Magento\Framework\View\Element\Context $context)
    {
        $this->_cacheManager = $context->getCache();
    }

    /**
     * @param $key
     * @return string
     */
    public function getFromCache($key)
    {
        $value = $this->_cacheManager->load(self::PREFIX_KEY . $key);
        return $value;
    }

    /**
     * @param $key
     * @param $value
     * @param array $tags
     * @param int $lifetime (600 = 10 minutes)
     */
    public function saveCache($key, $value, $tags = [], $lifetime = 600)
    {
        $this->_cacheManager->save($value, self::PREFIX_KEY . $key, [], $lifetime);
    }

    /**
     * @param $key
     */
    public function removeFromCache($key)
    {
        $this->_cacheManager->remove(self::PREFIX_KEY . $key);
    }
}

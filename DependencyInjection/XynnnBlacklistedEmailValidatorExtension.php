<?php
/*
 * This file is part of the BlacklistedEmailValidatorBundle project
 *
 * (c) Philipp Braeutigam <philipp.braeutigam@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xynnn\BlacklistedEmailValidatorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class XynnnBlacklistedEmailValidatorExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        if (array_key_exists('strict', $configs[0])) {
            $container->getDefinition('xynnn_blacklisted_email_validator.validator.blacklisted_email_validator')
                ->replaceArgument(0, $configs[0]['strict']);
        }

        if (array_key_exists('hosts', $configs[0]) && null !== $configs[0]['hosts']) {
            $container->getDefinition('xynnn_blacklisted_email_validator.validator.blacklisted_email_validator')
                ->replaceArgument(1, $configs[0]['hosts']);
        }
    }
}

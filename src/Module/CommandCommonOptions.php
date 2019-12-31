<?php

/**
 * @see       https://github.com/mezzio/mezzio-tooling for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-tooling/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-tooling/blob/master/LICENSE.md New BSD License
 */

namespace Mezzio\Tooling\Module;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * @internal
 */
final class CommandCommonOptions
{
    /**
     * Add default arguments and options used by all commands.
     */
    public static function addDefaultOptionsAndArguments(Command $command)
    {
        $command->addArgument(
            'module',
            InputArgument::REQUIRED,
            $command::HELP_ARG_MODULE
        );

        $command->addOption(
            'composer',
            'c',
            InputOption::VALUE_REQUIRED,
            'Specify the path to the composer binary; defaults to "composer"'
        );

        $command->addOption(
            'modules-path',
            'p',
            InputOption::VALUE_REQUIRED,
            'Specify the path to the modules directory; defaults to "src"'
        );
    }

    /**
     * Retrieve the modules path from input
     *
     * @param InputInterface $input
     * @return string
     */
    public static function getModulesPath(InputInterface $input)
    {
        $modulesPath = $input->getOption('modules-path') ?: 'src';
        $modulesPath = preg_replace('/^\.\//', '', str_replace('\\', '/', $modulesPath));
        return $modulesPath;
    }
}

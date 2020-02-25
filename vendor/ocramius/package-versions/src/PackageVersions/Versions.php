<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    public const VERSIONS          = array (
  'doctrine/annotations' => 'v1.8.0@904dca4eb10715b92569fbcd79e201d5c349b6bc',
  'doctrine/cache' => '1.10.0@382e7f4db9a12dc6c19431743a2b096041bcdd62',
  'doctrine/collections' => '1.6.4@6b1e4b2b66f6d6e49983cebfe23a21b7ccc5b0d7',
  'doctrine/common' => '2.12.0@2053eafdf60c2172ee1373d1b9289ba1db7f1fc6',
  'doctrine/dbal' => 'v2.10.1@c2b8e6e82732a64ecde1cddf9e1e06cb8556e3d8',
  'doctrine/doctrine-bundle' => '2.0.7@6926771140ee87a823c3b2c72602de9dda4490d3',
  'doctrine/doctrine-migrations-bundle' => '2.1.2@856437e8de96a70233e1f0cc2352fc8dd15a899d',
  'doctrine/event-manager' => '1.1.0@629572819973f13486371cb611386eb17851e85c',
  'doctrine/inflector' => '1.3.1@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => '1.3.0@ae466f726242e637cebdd526a7d991b9433bacf1',
  'doctrine/lexer' => '1.2.0@5242d66dbeb21a30dd8a3e66bf7a73b66e05e1f6',
  'doctrine/migrations' => '2.2.1@a3987131febeb0e9acb3c47ab0df0af004588934',
  'doctrine/orm' => 'v2.7.1@445796af0e873d9bd04f2502d322a7d5009b6846',
  'doctrine/persistence' => '1.3.6@5dd3ac5eebef2d0b074daa4440bb18f93132dee4',
  'doctrine/reflection' => 'v1.1.0@bc420ead87fdfe08c03ecc3549db603a45b06d4c',
  'egulias/email-validator' => '2.1.17@ade6887fd9bd74177769645ab5c474824f8a418a',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'monolog/monolog' => '1.25.3@fa82921994db851a8becaf3787a9e73c5976b6f1',
  'ocramius/package-versions' => '1.4.2@44af6f3a2e2e04f2af46bcb302ad9600cba41c7d',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.4@da3fd972d6bafd628114f7e7e036f45944b62e9c',
  'phpdocumentor/type-resolver' => '1.0.1@2e32a6d48972b2c1976ed5d8967145b6cec4a4a9',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.2@446d54b4cb6bf489fc9d75f55843658e6f25d801',
  'sensio/framework-extra-bundle' => 'v5.5.3@98f0807137b13d0acfdf3c255a731516e97015de',
  'symfony/asset' => 'v4.4.4@2c67c89d064bfb689ea6bc41217c87100bb94c17',
  'symfony/cache' => 'v4.4.4@0198a01c8d918d6d717f96dfdcba9582bc5f6468',
  'symfony/cache-contracts' => 'v2.0.1@23ed8bfc1a4115feca942cb5f1aacdf3dcdf3c16',
  'symfony/config' => 'v4.4.4@4d3979f54472637169080f802dc82197e21fdcce',
  'symfony/console' => 'v4.4.4@f512001679f37e6a042b51897ed24a2f05eba656',
  'symfony/debug' => 'v4.4.4@20236471058bbaa9907382500fc14005c84601f0',
  'symfony/dependency-injection' => 'v4.4.4@ec60a7d12f5e8ab0f99456adce724717d9c1784a',
  'symfony/doctrine-bridge' => 'v4.4.4@b8d43116f0e5abef4b7abcbeec81c3b9328ca7b7',
  'symfony/dotenv' => 'v4.4.4@b74a1638f53e3c65e4bbfc2a03c23fdc400fd243',
  'symfony/error-handler' => 'v4.4.4@d2721499ffcaf246a743e01cdf6696d3d5dd74c1',
  'symfony/event-dispatcher' => 'v4.4.4@9e3de195e5bc301704dd6915df55892f6dfc208b',
  'symfony/event-dispatcher-contracts' => 'v1.1.7@c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
  'symfony/expression-language' => 'v4.4.4@8b145496d7e2e7103b1a1b8f1fce81c6e084b380',
  'symfony/filesystem' => 'v4.4.4@266c9540b475f26122b61ef8b23dd9198f5d1cfd',
  'symfony/finder' => 'v4.4.4@3a50be43515590faf812fbd7708200aabc327ec3',
  'symfony/flex' => 'v1.6.2@e4f5a2653ca503782a31486198bd1dd1c9a47f83',
  'symfony/form' => 'v4.4.4@442d561fa10841183f94909830d9d27bd9cf7f77',
  'symfony/framework-bundle' => 'v4.4.4@afc96daad6049cbed34312b34005d33fc670d022',
  'symfony/http-client' => 'v4.4.4@250c5363e4d67f8e3c9cdf3362f134e040e69612',
  'symfony/http-client-contracts' => 'v2.0.1@378868b61b85c5cac6822d4f84e26999c9f2e881',
  'symfony/http-foundation' => 'v4.4.4@491a20dfa87e0b3990170593bc2de0bb34d828a5',
  'symfony/http-kernel' => 'v4.4.4@62116a9c8fb15faabb158ad9cb785c353c2572e5',
  'symfony/inflector' => 'v4.4.4@f419ab2853cc00471ffd7fc18e544b5f5a90adb1',
  'symfony/intl' => 'v4.4.4@ab482c70a9748abed5139a967b8182db15e4ffac',
  'symfony/mailer' => 'v4.4.4@74c15502242b4f23dd28643a351db781ea2cd85a',
  'symfony/mime' => 'v4.4.4@225034620ecd4b34fd826e9983d85e2b7a359094',
  'symfony/monolog-bridge' => 'v4.4.4@b582d06cc125f3659f5ca00757bbfd8b822c0706',
  'symfony/monolog-bundle' => 'v3.5.0@dd80460fcfe1fa2050a7103ad818e9d0686ce6fd',
  'symfony/options-resolver' => 'v4.4.4@9a02d6662660fe7bfadad63b5f0b0718d4c8b6b0',
  'symfony/orm-pack' => 'v1.0.8@c9bcc08102061f406dc908192c0f33524a675666',
  'symfony/polyfill-intl-icu' => 'v1.14.0@727b3bb5bfa7ca9eeb86416784cf1c08a6289b86',
  'symfony/polyfill-intl-idn' => 'v1.14.0@6842f1a39cf7d580655688069a03dd7cd83d244a',
  'symfony/polyfill-mbstring' => 'v1.14.0@34094cfa9abe1f0f14f48f490772db7a775559f2',
  'symfony/polyfill-php72' => 'v1.14.0@46ecacf4751dd0dc81e4f6bf01dbf9da1dc1dadf',
  'symfony/polyfill-php73' => 'v1.14.0@5e66a0fa1070bf46bec4bea7962d285108edd675',
  'symfony/process' => 'v4.4.4@f5697ab4cb14a5deed7473819e63141bf5352c36',
  'symfony/property-access' => 'v4.4.4@090b4bc92ded1ec512f7e2ed1691210769dffdb3',
  'symfony/property-info' => 'v4.4.4@e6355ba81c738be31c3c3b3cd7929963f98da576',
  'symfony/routing' => 'v4.4.4@7bf4e38573728e317b926ca4482ad30470d0e86a',
  'symfony/security-bundle' => 'v4.4.4@7829cc34b8231cb8d10621cdf27d04bfdc600334',
  'symfony/security-core' => 'v4.4.4@d2550b4ecd63f612763e0af2cbcb1a69a700fe99',
  'symfony/security-csrf' => 'v4.4.4@da4664d94164e2b50ce75f2453724c6c33222505',
  'symfony/security-guard' => 'v4.4.4@f457f2d6d7392259b1ede1d036a26b6c1fa20202',
  'symfony/security-http' => 'v4.4.4@736d09554f78f3444f5aeed3d18a928c7a8a53fb',
  'symfony/serializer' => 'v4.4.4@76ecc214a93b763c29b924277e85f64326f9fbb2',
  'symfony/serializer-pack' => 'v1.0.2@c5f18ba4ff989a42d7d140b7f85406e77cd8c4b2',
  'symfony/service-contracts' => 'v2.0.1@144c5e51266b281231e947b51223ba14acf1a749',
  'symfony/stopwatch' => 'v4.4.4@abc08d7c48987829bac301347faa10f7e8bbf4fb',
  'symfony/translation' => 'v4.4.4@f5d2ac46930238b30a9c2f1b17c905f3697d808c',
  'symfony/translation-contracts' => 'v2.0.1@8cc682ac458d75557203b2f2f14b0b92e1c744ed',
  'symfony/twig-bridge' => 'v4.4.4@d5f3e83e2cc2fcdd60c351b5be1beb9533cf698c',
  'symfony/twig-bundle' => 'v4.4.4@d3e3e46e9e683e946746219570299ba07506260a',
  'symfony/twig-pack' => 'v1.0.0@8b278ea4b61fba7c051f172aacae6d87ef4be0e0',
  'symfony/validator' => 'v4.4.4@eb3e15de5c63873ca6e2a88b56a029f7be4c5953',
  'symfony/var-dumper' => 'v4.4.4@46b53fd714568af343953c039ff47b67ce8af8d6',
  'symfony/var-exporter' => 'v4.4.4@1a76a943f2af334da13bc9f33f49392fa530eec9',
  'symfony/web-link' => 'v4.4.4@dad60d94b2e7f16e1a7d0ebd0f1f460f45a51386',
  'symfony/webpack-encore-bundle' => 'v1.7.3@5c0f659eceae87271cce54bbdfb05ed8ec9007bd',
  'symfony/yaml' => 'v4.4.4@cd014e425b3668220adb865f53bff64b3ad21767',
  'twig/extra-bundle' => 'v3.0.3@6eaf1637abe6b68518e7e0949ebb84e55770d5c6',
  'twig/twig' => 'v3.0.3@3b88ccd180a6b61ebb517aea3b1a8906762a1dc2',
  'webmozart/assert' => '1.7.0@aed98a490f9a8f78468232db345ab9cf606cf598',
  'zendframework/zend-code' => '3.4.1@268040548f92c2bfcba164421c1add2ba43abaaa',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'easycorp/easy-log-handler' => 'v1.0.9@224e1dfcf9455aceee89cd0af306ac097167fac1',
  'nikic/php-parser' => 'v4.3.0@9a9981c347c5c49d6dfe5cf826bb882b824080dc',
  'symfony/browser-kit' => 'v4.4.4@45cae6dd8683d2de56df7ec23638e9429c70135f',
  'symfony/css-selector' => 'v4.4.4@a167b1860995b926d279f9bb538f873e3bfa3465',
  'symfony/debug-bundle' => 'v4.4.4@570c3c69e69f7709f184ee3acbebe45e5ff1adce',
  'symfony/debug-pack' => 'v1.0.7@09a4a1e9bf2465987d4f79db0ad6c11cc632bc79',
  'symfony/dom-crawler' => 'v4.4.4@b66fe8ccc850ea11c4cd31677706c1219768bea1',
  'symfony/maker-bundle' => 'v1.14.3@c864e7f9b8d1e1f5f60acc3beda11299f637aded',
  'symfony/phpunit-bridge' => 'v5.0.4@38959f0ef4cea3e003f94c670bca89b2f4d932c5',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/test-pack' => 'v1.0.6@ff87e800a67d06c423389f77b8209bc9dc469def',
  'symfony/web-profiler-bundle' => 'v4.4.4@59822e61467f910a877e9ce432b461034f843cfa',
  'paragonie/random_compat' => '2.*@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
  'symfony/polyfill-ctype' => '*@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
  'symfony/polyfill-iconv' => '*@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
  'symfony/polyfill-php71' => '*@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
  'symfony/polyfill-php70' => '*@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
  'symfony/polyfill-php56' => '*@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
  '__root__' => 'dev-master@768bd76c95a99d0a1f34c6f6749cb8ac1b4cd263',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}

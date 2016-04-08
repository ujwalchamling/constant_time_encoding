<?php
use \ParagonIE\ConstantTime\Base32;
use \ParagonIE\ConstantTime\Base32Hex;
use \ParagonIE\ConstantTime\Base64;
use \ParagonIE\ConstantTime\Base64DotSlash;
use \ParagonIE\ConstantTime\Base64DotSlashOrdered;
use \ParagonIE\ConstantTime\Encoding;
use \ParagonIE\ConstantTime\Hex;

/**
 * Class RFC4648Test
 *
 * @ref https://tools.ietf.org/html/rfc4648#section-10
 */
class RFC4648Test extends PHPUnit_Framework_TestCase
{
    public function testVectorBase64()
    {
        $this->assertEquals(Base64::encode(''), '');
        $this->assertEquals(Base64::encode('f'), 'Zg==');
        $this->assertEquals(Base64::encode('fo'), 'Zm8=');
        $this->assertEquals(Base64::encode('foo'), 'Zm9v');
        $this->assertEquals(Base64::encode('foob'), 'Zm9vYg==');
        $this->assertEquals(Base64::encode('fooba'), 'Zm9vYmE=');
        $this->assertEquals(Base64::encode('foobar'), 'Zm9vYmFy');
    }

    public function testVectorBase32()
    {
        $this->assertEquals(Base32::encode(''), '');
        $this->assertEquals(Base32::encode('f'), 'my======');
        $this->assertEquals(Base32::encode('fo'), 'mzxq====');
        $this->assertEquals(Base32::encode('foo'), 'mzxw6===');
        $this->assertEquals(Base32::encode('foob'), 'mzxw6yq=');
        $this->assertEquals(Base32::encode('fooba'), 'mzxw6ytb');
        $this->assertEquals(Base32::encode('foobar'), 'mzxw6ytboi======');

        $this->assertEquals(Base32::encodeUpper(''), '');
        $this->assertEquals(Base32::encodeUpper('f'), 'MY======');
        $this->assertEquals(Base32::encodeUpper('fo'), 'MZXQ====');
        $this->assertEquals(Base32::encodeUpper('foo'), 'MZXW6===');
        $this->assertEquals(Base32::encodeUpper('foob'), 'MZXW6YQ=');
        $this->assertEquals(Base32::encodeUpper('fooba'), 'MZXW6YTB');
        $this->assertEquals(Base32::encodeUpper('foobar'), 'MZXW6YTBOI======');
    }

    public function testVectorBase32Hex()
    {
        $this->assertEquals(Base32Hex::encode(''), '');
        $this->assertEquals(Base32Hex::encode('f'), 'co======');
        $this->assertEquals(Base32Hex::encode('fo'), 'cpng====');
        $this->assertEquals(Base32Hex::encode('foo'), 'cpnmu===');
        $this->assertEquals(Base32Hex::encode('foob'), 'cpnmuog=');
        $this->assertEquals(Base32Hex::encode('fooba'), 'cpnmuoj1');
        $this->assertEquals(Base32Hex::encode('foobar'), 'cpnmuoj1e8======');

        $this->assertEquals(Base32Hex::encodeUpper(''), '');
        $this->assertEquals(Base32Hex::encodeUpper('f'), 'CO======');
        $this->assertEquals(Base32Hex::encodeUpper('fo'), 'CPNG====');
        $this->assertEquals(Base32Hex::encodeUpper('foo'), 'CPNMU===');
        $this->assertEquals(Base32Hex::encodeUpper('foob'), 'CPNMUOG=');
        $this->assertEquals(Base32Hex::encodeUpper('fooba'), 'CPNMUOJ1');
        $this->assertEquals(Base32Hex::encodeUpper('foobar'), 'CPNMUOJ1E8======');
    }

    public function testVectorBase16()
    {
        $this->assertEquals(Hex::encode(''), '');
        $this->assertEquals(Hex::encode('f'), '66');
        $this->assertEquals(Hex::encode('fo'), '666f');
        $this->assertEquals(Hex::encode('foo'), '666f6f');
        $this->assertEquals(Hex::encode('foob'), '666f6f62');
        $this->assertEquals(Hex::encode('fooba'), '666f6f6261');
        $this->assertEquals(Hex::encode('foobar'), '666f6f626172');

        $this->assertEquals(Hex::encodeUpper(''), '');
        $this->assertEquals(Hex::encodeUpper('f'), '66');
        $this->assertEquals(Hex::encodeUpper('fo'), '666F');
        $this->assertEquals(Hex::encodeUpper('foo'), '666F6F');
        $this->assertEquals(Hex::encodeUpper('foob'), '666F6F62');
        $this->assertEquals(Hex::encodeUpper('fooba'), '666F6F6261');
        $this->assertEquals(Hex::encodeUpper('foobar'), '666F6F626172');
    }
}

<?php
use PHPUnit\Framework\TestCase;
use App\Regex;

final class RegexTest extends TestCase
{
    // 0
    public function testContainsLetterA(): void
    {
        $this->assertTrue(Regex::containsLetterA("almaFa"));
        $this->assertFalse(Regex::containsLetterA("bokor"));
    }

    // 1
    public function testIsValidEmail()
    {
        $this->assertTrue(Regex::isValidEmail('user@example.com'));
        $this->assertFalse(Regex::isValidEmail('invalid@domain'));
    }

    // 2
    public function testContainsNumber()
    {
        $this->assertTrue(Regex::containsNumber('abc123'));
        $this->assertFalse(Regex::containsNumber('abcdef'));
    }

    // 3
    public function testContainsOnlyLetters()
    {
        $this->assertTrue(Regex::containsOnlyLetters('Almafa'));
        $this->assertFalse(Regex::containsOnlyLetters('Alma123'));
    }

    // 4
    public function testIsUppercase()
    {
        $this->assertTrue(Regex::isUppercase('HELLO'));
        $this->assertFalse(Regex::isUppercase('Hello'));
    }

    // 5
    public function testIsLowercase()
    {
        $this->assertTrue(Regex::isLowercase('hello'));
        $this->assertFalse(Regex::isLowercase('Hello'));
    }

    // 6
    public function testStartsWithDigit()
    {
        $this->assertTrue(Regex::startsWithDigit('5alma'));
        $this->assertFalse(Regex::startsWithDigit('alma5'));
    }

    // 7
    public function testEndsWithPunctuation()
    {
        $this->assertTrue(Regex::endsWithPunctuation('Szia!'));
        $this->assertFalse(Regex::endsWithPunctuation('Szia'));
    }

    // 8
    public function testContainsWord()
    {
        $this->assertTrue(Regex::containsWord('Ez egy almafa.', 'almafa'));
        $this->assertFalse(Regex::containsWord('Ez egy körte.', 'almafa'));
    }

    // 9
    public function testReplaceSpacesWithUnderscore()
    {
        $this->assertEquals('Ez_egy_szoveg', Regex::replaceSpacesWithUnderscore('Ez egy szoveg'));
    }

    // 10
    public function testRemoveDigits()
    {
        $this->assertEquals('abc', Regex::removeDigits('a1b2c3'));
    }

    // 11
    public function testExtractNumbers()
    {
        $this->assertEquals(['12', '45'], Regex::extractNumbers('Alma12 körte45'));
    }

    // 12
    public function testCountWordsStartingWithA()
    {
        $this->assertEquals(2, Regex::countWordsStartingWithA('Almafa alatt áll az anya.'));
    }

    // 13
    public function testHasPhoneNumber()
    {
        $this->assertTrue(Regex::hasPhoneNumber('Hívj a +36 30 123 4567 számon!'));
        $this->assertFalse(Regex::hasPhoneNumber('Nincs szám a szövegben.'));
    }

    // 14
    public function testIsPostalCode()
    {
        $this->assertTrue(Regex::isPostalCode('1234'));
        $this->assertFalse(Regex::isPostalCode('12345'));
    }

    // 15
    public function testExtractHashtags()
    {
        $this->assertEquals(['#php', '#regex'], Regex::extractHashtags('Tanulj #php és #regex témában!'));
    }

    // 16
    public function testExtractEmails()
    {
        $emails = Regex::extractEmails('írj a john@example.com vagy jane@test.hu címre');
        $this->assertContains('john@example.com', $emails);
        $this->assertContains('jane@test.hu', $emails);
    }

    // 17
    public function testValidateUsername()
    {
        $this->assertTrue(Regex::validateUsername('User_01'));
        $this->assertFalse(Regex::validateUsername('U'));
    }

    // 18
    public function testReplaceMultipleSpaces()
    {
        $this->assertEquals('Ez egy mondat', Regex::replaceMultipleSpaces('Ez   egy   mondat'));
    }

    // 19
    public function testExtractDomain()
    {
        $this->assertEquals('example.com', Regex::extractDomain('user@example.com'));
    }

    // 20
    public function testMaskEmail()
    {
        $this->assertEquals('****@example.com', Regex::maskEmail('user@example.com'));
    }

    // 21
    public function testIsValidIPv4()
    {
        $this->assertTrue(Regex::isValidIPv4('192.168.0.1'));
        $this->assertFalse(Regex::isValidIPv4('999.999.999.999'));
    }

    // 22
    public function testIsValidDate()
    {
        $this->assertTrue(Regex::isValidDate('2023-05-15'));
        $this->assertFalse(Regex::isValidDate('2023-02-30'));
        $this->assertFalse(Regex::isValidDate('15-05-2023'));
    }

    // 23
    public function testExtractURLs()
    {
        $urls = Regex::extractURLs('Látogasd meg https://example.com vagy http://test.hu oldalakat.');
        $this->assertContains('https://example.com', $urls);
        $this->assertContains('http://test.hu', $urls);
    }

    // 24
    public function testFindDuplicateWords()
    {
        $this->assertEquals(['hello'], Regex::findDuplicateWords('hello hello world'));
    }

    // 25
    public function testIsStrongPassword()
    {
        $this->assertTrue(Regex::isStrongPassword('Aa1!abcd'));
        $this->assertFalse(Regex::isStrongPassword('gyenge'));
    }

    // 26
    public function testExtractHTMLTags()
    {
        $tags = Regex::extractHTMLTags('<div><p>Hello</p><span>World</span></div>');
        $this->assertContains('div', $tags);
        $this->assertContains('p', $tags);
        $this->assertContains('span', $tags);
    }

    // 27
    public function testRemoveHTMLTags()
    {
        $this->assertEquals('Hello World', Regex::removeHTMLTags('<p>Hello <b>World</b></p>'));
    }

    // 28
    public function testSplitCSVLine()
    {
        $input = '"alma", "körte,szilva", "barack"';
        $expected = ['alma', 'körte,szilva', 'barack'];
        $this->assertEquals($expected, Regex::splitCSVLine($input));
    }

    // 29
    public function testValidateHexColor()
    {
        $this->assertTrue(Regex::validateHexColor('#FFF'));
        $this->assertTrue(Regex::validateHexColor('#A1B2C3'));
        $this->assertFalse(Regex::validateHexColor('#12345G'));
    }

    // 30
    public function testExtractQuotedStrings()
    {
        $strings = Regex::extractQuotedStrings('"alma" és "körte" meg \'barack\'');
        $this->assertContains('alma', $strings);
        $this->assertContains('körte', $strings);
        $this->assertContains('barack', $strings);
    }
}
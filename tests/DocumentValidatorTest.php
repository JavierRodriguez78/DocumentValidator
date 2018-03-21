<?php

namespace DocumentValidator\Tests;

use DocumentValidator\DocumentValidator;
use PhpParser\Comment\Doc;
use PHPUnit\Framework\TestCase;

class DocumentValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function itShoudValidateAValidNif(){
        $validator = new DocumentValidator();
        $result =$validator->isValidIdNumber('44865710R', 'nif');
        $this ->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShoudNotValidateAnInValidNif(){
        $validator = new DocumentValidator();
        $result =$validator->isValidIdNumber('3434.434', 'nif');
        $this ->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShoudValidateAValidNiE(){
        $validator = new DocumentValidator();
        $result =$validator->isValidIdNumber('X6089822C', 'nie');
        $this ->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShoudNotValidateAnInValidNie(){
        $validator = new DocumentValidator();
        $result =$validator->isValidIdNumber('@3434.434', 'nie');
        $this ->assertFalse($result);
    }


    /**
     * @test
     * @dataProvider getValidCif
     */
    public function itShoudValidateAValidCif($cif){
        $validator = new DocumentValidator();
        $result = $validator->isValidIdNumber($cif,'cif');
        $this ->assertTrue($result);
    }


    public function getValidCif()
    {
        return[
                        ['B66044967'],
                        ['B23901762'],
                        ['Q0107868B'],
                        ['A29814019'],
                        ['A04828547'],
                        ['Q3456795H'],
                        ['B68466820'],
                        ['A58313859'],
                        ['S5750409D'],
        ];
    }
    /**
     * @test
     */
    public function itShoudNotValidateAnInValidCif(){
        $validator = new DocumentValidator();
        $result =$validator->isValidIdNumber('3434.434', 'cif');
        $this ->assertFalse($result);
    }

    /**
     * @test
     * @expectedException \Exception
     * @expectedExceptionMessage  Unsuportted Type
     */
    /*public function itShouldThrownAnExceptionWhenDocumentTypeIsInvalid(){
        $validator = new DocumentValidator();
        $validator->isValidIdNumber('F43298256', 'pepe');
    }*/


}

<?php

namespace Tests\Unit\Src;

use PHPUnit\Framework\TestCase;
use App\Src\Dominio;

require __DIR__ . "\..\..\..\src\Dominio.php";

class DominioTest extends TestCase
{
   
    public function testValidaDominioVazioSuccess()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->validaDominioVazio();

        static::assertFalse($response);
    }

	public function testValidaDominioVazioFails()
    {
        $dominio = new Dominio('');
        $response = $dominio->validaDominioVazio();

        static::assertTrue($response);
    }

    public function testValidaRetiraEspacosSuccess()
    {
        $dominio = new Dominio('google. com. br');
        $response = $dominio->retiraEspacos();

        static::assertEquals($response, 'google.com.br');
    }

     public function testValidaRetiraEspacosFails()
    {
        $dominio = new Dominio('google. com. br');
        $response = $dominio->retiraEspacos();

        static::assertEquals($response, 'google. com. br');
    }

   public function testMinimoCaracteresSuccess()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->minimoCaracteres();

        static::assertStringMatchesFormat($response, 'google.com.br');
    }

    public function testMinimoCaracteresFails()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->minimoCaracteres();

        static::assertStringMatchesFormat($response, 'g');
    }

    public function testMaximoCaracteresSuccess()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->maximoCaracteres();

        static::assertStringMatchesFormat($response, 'google.com.br');
    }

    public function testMaximoCaracteresFails()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->maximoCaracteres();

        static::assertStringMatchesFormat($response, 'googleonovostestesqa.com.br');
    }

    public function testSomenteNumerosSuccess()
    {
        $dominio = new Dominio('g1ogle.com.br');
        $response = $dominio->somenteNumeros();

        static::assertFalse($response);
    }

    public function testSomenteNumerosFails()
    {
        $dominio = new Dominio('123456789');
        $response = $dominio->somenteNumeros();

        static::assertTrue($response);
    }

      public function testVerificarDominioRegistradoSuccess()
    {
        $dominio = new Dominio('novosite.com.br');
        $response = $dominio->verificarDominioRegistrado();

        static::assertTrue($response);
    }

    public function testVerificarDominioRegistradoFails()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->verificarDominioRegistrado();

        static::assertFalse($response);
    }
}
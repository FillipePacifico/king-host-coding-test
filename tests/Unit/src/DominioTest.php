<?php

namespace Tests\Unit\Src;

use PHPUnit\Framework\TestCase;
use App\Src\Dominio;

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

        static::assertEquals('google.com.br', $response);
    }

     public function testValidaRetiraEspacosFails()
    {
        $dominio = new Dominio('google. com. br');
        $response = $dominio->retiraEspacos();

        static::assertNotEquals('google. com. br', $response);
    }

   public function testMinimoCaracteresSuccess()
   {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->minimoCaracteres();

        static::assertTrue($response);
    }

    public function testMinimoCaracteresFails()
    {
        $dominio = new Dominio('g');
        $response = $dominio->minimoCaracteres();

        static::assertFalse($response);
    }

    public function testMaximoCaracteresSuccess()
    {
        $dominio = new Dominio('google.com.br');
        $response = $dominio->maximoCaracteres();

        static::assertTrue($response);
    }

    public function testMaximoCaracteresFails()
    {
        $dominio = new Dominio('agendamento.online.google.com.br');
        $response = $dominio->maximoCaracteres();

        static::assertFalse($response);
    }

    public function testSomenteNumerosSuccess()
    {
        $dominio = new Dominio('google123.com.br');
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

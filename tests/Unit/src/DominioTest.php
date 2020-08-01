<?php

namespace Tests\Unit\Src;

use PHPUnit\Framework\TestCase;
use App\Src\Dominio;

// TODO: colocar para funcionar tanto em LINUX quanto WINDOWS
// include '..\..\..\src\Dominio.php';
include join(DIRECTORY_SEPARATOR, ['C:', 'wamp64', 'www', 'king-host-test', 'src', 'Dominio.php']);
// TODO: procurar como implementar autoload no projeto

class DominioTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

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
}
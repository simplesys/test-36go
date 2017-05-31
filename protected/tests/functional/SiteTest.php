<?php

class SiteTest extends WebTestCase
{
    public function testIndex()
    {
        $this->open('');
        $this->assertTextPresent('Оформить заявку на приём к врачу');
    }
}

<?php

abstract class DAO {
    public function __construct()
    {
        $this->conexao = new MySQL();
    }
}
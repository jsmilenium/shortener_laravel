<?php

namespace App\Interfaces;


interface CrawlerInterface
{
    public function curl(): array;
    public function search(): array;
    public function save($data): void;
    public function truncateTable(): void;
    public function message($msg): void;
    public function init(): void;
}

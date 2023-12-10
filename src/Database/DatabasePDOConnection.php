<?php
declare(strict_types=1);


class DatabasePDOConnection implements DatabaseConnection
{
    public function __construct(
        private DatabaseConfiguration $configuration,
    ) {}

    public function connection(): \PDO
    {
        return new \PDO(
            $this->getDSN(),
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getOptions(),
        );
    }

    private function getDSN(): string
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->configuration->getPort(),
            $this->configuration->getHost(),
            $this->configuration->getDbName(),
            $this->configuration->getCharset(),
        );
    }

}

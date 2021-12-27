<?php
interface DBinterface {
    public function DBConnection() : AbstractDBConnection;
    public function DBRecrord() : AbstractDBRecrord;
    public function DBQueryBuiler() : AbstractDBQueryBuiler;
}

class MySQLFactory implements DBinterface {
    public function DBConnection() : AbstractDBConnection {
        return new MySQLDBConnection();
    }
    public function DBRecrord() : AbstractDBRecrord {
        return new MySQLDBRecrord();
    }
    public function DBQueryBuiler() : AbstractDBQueryBuiler {
        return new MySQLDBQueryBuiler();
    }
}


class PostgreSQLFactory implements DBinterface {
    public function DBConnection() : AbstractDBConnection {
        return new PostgreSQLDBConnection();
    }
    public function DBRecrord() : AbstractDBRecrord {
        return new PostgreSQLDBRecrord();
    }
    public function DBQueryBuiler() : AbstractDBQueryBuiler {
        return new PostgreSQLDBQueryBuiler();
    }
}


class OracleFactory implements DBinterface {
    public function DBConnection() : AbstractDBConnection {
        return new OracleDBConnection();
    }
    public function DBRecrord() : AbstractDBRecrord {
        return new OracleDBRecrord();
    }
    public function DBQueryBuiler() : AbstractDBQueryBuiler {
        return new OracleDBQueryBuiler();
    }
}


interface AbstractDBConnection {
    public function connect() : string;
}

class MySQLDBConnection implements AbstractDBConnection {
    public function connect(): string
    {
        return "это MySQLDBConnection!";
    }
}
class PostgreSQLDBConnection implements AbstractDBConnection {
    public function connect(): string
    {
        return "это PostgreSQLDBConnection!";
    }
}
class OracleDBConnection implements AbstractDBConnection {
    public function connect(): string
    {
        return "это OracleDBConnection!";
    }
}

interface AbstractDBRecrord {
    public function record() : string;
}

class MySQLDBRecrord implements AbstractDBRecrord {
    public function record(): string
    {
        return "это MySQLDBRecrord";
    }
}
class PostgreSQLDBRecrord implements AbstractDBRecrord {
    public function record(): string
    {
        return "это PostgreSQLDBRecrord";
    }
}
class OracleDBRecrord implements AbstractDBRecrord {
    public function record(): string
    {
        return "это OracleDBRecrord";
    }
}

interface AbstractDBQueryBuiler {
    public function builder() : string;
}

class MySQLDBQueryBuiler implements AbstractDBQueryBuiler {
    public function builder(): string
    {
        return "это MySQLDBQueryBuiler";
    }
}
class PostgreSQLDBQueryBuiler implements AbstractDBQueryBuiler {
    public function builder(): string
    {
        return "это PostgreSQLDBQueryBuiler";
    }
}
class OracleDBQueryBuiler implements AbstractDBQueryBuiler {
    public function builder(): string
    {
        return "это OracleDBQueryBuiler";
    }
}
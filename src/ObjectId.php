<?php

namespace WooServ\ObjectId;

class ObjectId
{
    protected static ?string $machineHash = null;
    protected static int $counter;

    public static function generate(): string
    {
        $timestamp = pack('N', time());

        if (!self::$machineHash) {
            self::$machineHash = substr(md5(gethostname()), 0, 6);
        }

        $pid = pack('n', getmypid());

        if (!isset(self::$counter)) {
            self::$counter = random_int(0, 0xffffff);
        }

        self::$counter = (self::$counter + 1) % 0xffffff;

        $counter = substr(pack('N', self::$counter), 1, 3);

        $binary = $timestamp . hex2bin(self::$machineHash) . $pid . $counter;

        return bin2hex($binary);
    }

    public static function isValid(?string $id): bool
    {
        return is_string($id) && preg_match('/^[a-f0-9]{24}$/i', $id);
    }

    public static function getTimestamp(string $id): int
    {
        return unpack('N', hex2bin(substr($id, 0, 8)))[1];
    }
}

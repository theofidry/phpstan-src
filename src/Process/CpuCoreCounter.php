<?php declare(strict_types = 1);

namespace PHPStan\Process;

use Fidry\CpuCounter\CpuCoreCounter as FidryCpuCoreCounter;
use Fidry\CpuCounter\NumberOfCpuCoreNotFound;

class CpuCoreCounter
{

	private ?int $count = null;

	public function getNumberOfCpuCores(): int
	{
		if ($this->count !== null) {
			return $this->count;
		}

        try {
            return (new FidryCpuCoreCounter())->getCount();
        } catch (NumberOfCpuCoreNotFound $exception) {
            return 1;
        }
	}

}

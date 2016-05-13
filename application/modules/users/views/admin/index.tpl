<h1>Manage Users</h1>

{$pagination}


{if (!empty($stats['from']) && !empty($stats['to']) && !empty($stats['total'])) }
'Showing ' . {$stats['from']} . ' to ' . {$stats['to']} . ' of ' . {$stats['total']} . ' results';
{/if}

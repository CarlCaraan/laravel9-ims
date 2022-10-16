<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'DEPED-SDO')
            <img src="https://i.ibb.co/hmnZp9G/auth-brand.png" class="logo" alt="App Logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
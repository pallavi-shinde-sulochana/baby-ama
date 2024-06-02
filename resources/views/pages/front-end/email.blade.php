


<tr>
    <td class="header">
       <h1 style="text-align: center;"> Suguna Group</h1>
    </td>
</tr>
<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td>
        @if($details)
            @foreach ($details as $key => $detail)
                     <p> {{ $key.' : '.$detail }}</p>
            @endforeach
        @endif
        </td>
    </tr>
</table>



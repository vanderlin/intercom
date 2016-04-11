<table class="table table-striped">
<thead>
	<tr>
		<th>Name</th> 
		<th>Type</th> 
		<th>Amount</th> 
		<th>Date</th> 
	</tr> 
</thead>
<tbody>
@foreach ($goals as $g)
	<?php 
	$total_cont = 0;
	if($g->contributions) {
		foreach ($g->contributions as $c) { 
			$total_cont += $c->amount;
		}
	}
	?>
	<tr> 
		<td>{{$g->title}}</td> 
		<td>{{$g->type?"Savings":"Pay off"}}</td> 
		<td>${{money_format ( '%i', $total_cont)}} of ${{money_format ( '%i', $g->value)}}</td>
		<td>{{$g->date}}</td>
	</tr>
@endforeach
</tbody>
</table>
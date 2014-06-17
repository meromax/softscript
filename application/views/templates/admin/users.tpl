{$users}
					<table cellpadding="0" cellspacing="0" class="cont2" align="center">
						<tr>
							<td  class="header" colspan="8">Users  Managment</td>
						</tr>
					  	  <tr>
							<td class="header">User Name</td>
							<td class="header">First Name</td>
							<td class="header">Last Name</td>
							<td class="header">Gender</td>
							<td class="header">Country</td>
							<td class="header">Email</td>
							<td class="header">Birthday</td>
							<td class="header">Options</td>
						</tr>
						{foreach from=$users item=user}
                          	<tr bgcolor="{cycle values="#ffffff,#EEEEEE"}" style="height:20px">
							    <td >{$user.email}</td>             
								<td >{$user.first_name}</td>                
								<td >{$user.last_name}</td>
								<td >{$user.gender}</td>
								<td >{$user.country}</td>
								<td >{$user.email}</td>
                                <td >{$user.birthday}</td>
							  <td nowrap="nowrap">
							  	<a id="edit_video" href="/prarea/users/view/{$user.username}">view</a>
							  {if $user.acc_status=='active'}| <a id="edit_video" href="/prarea/users/deact/{$user.id}">deactivate</a>{/if}</td>
						  	</tr>
						  {/foreach}                              
					  </table>							

				<div class="middle_col">
					<?php 
					if($this->session->flashdata('error')){
					echo '<div id="error_msg">Niepowodzenie! '.$this->session->flashdata('error').'</div>';
				}
				if($this->session->flashdata('success')){
					echo '<div id="success_msg">Gratulacje! '.$this->session->flashdata('success').'</div>';
				}
					$this->load->view('pages/'.$view);
					$this->load->view('templates/footer');
					?>
				</div>
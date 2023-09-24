<?php

  include 'cont_chamado.php';

?>


<ul class="list-unstyled mb-0">
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="painel_chamado.php?status=Triagem">
      <span class="d-inline-block bg-secondary rounded-circle p-1">(<?php echo $triagem; ?>)</span>
      Triagem
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="painel_chamado.php?status=Não%20Impor/Não%20Urgen">
      <span class="d-inline-block bg-primary rounded-circle p-1">(<?php echo $n_imp_n_urg; ?>)</span>
      Não Impor/Não Urgen
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="painel_chamado.php?status=Não%20Impor/Urgente">
      <span class="d-inline-block bg-success rounded-circle p-1">(<?php echo $n_imp_urg; ?>)</span>
      Não Impor/Urgente
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="painel_chamado.php?status=Importante/Não%20Urgen">
      <span class="d-inline-block bg-warning rounded-circle p-1">(<?php echo $imp_n_urg; ?>)</span>
      Importante/Não Urgen
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="painel_chamado.php?status=Importante/Urgente">
      <span class="d-inline-block bg-danger rounded-circle p-1">(<?php echo $imp_urg; ?>)</span>
      Importante/Urgente
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="painel_chamado.php?status=Finalizado">
      <span class="d-inline-block bg-info rounded-circle p-1">(<?php echo $finalizados; ?>)</span>
      Finalizado
    </a>
  </li>
</ul>
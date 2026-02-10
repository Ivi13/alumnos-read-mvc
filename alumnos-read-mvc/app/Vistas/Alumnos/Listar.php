<?php if (!empty($error)): ?>
  <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<div class="tarjeta">
  <h2>Listado de alumnos</h2>

  <?php if (empty($alumnos)): ?>
    <p>No hay alumnos todavía.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Edad</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($alumnos as $a): ?>
          <tr>
            <td><?php echo htmlspecialchars($a->fechaCreacion); ?></td>
            <td><?php echo htmlspecialchars($a->nombre); ?></td>
            <td><?php echo htmlspecialchars($a->email ?? ''); ?></td>
            <td><?php echo htmlspecialchars($a->edad); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
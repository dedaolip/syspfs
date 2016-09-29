CREATE or replace VIEW v_reservas AS
SELECT
  b.id as id_usuario,
  b.name AS usuario,
  c.id as id_sala,
  c.name AS sala,
  d.id as id_projetor,
  d.name AS projetor,
  e.id as id_notebook,
  e.name AS notebook,
  f.id as id_som,
  f.name AS som,
  g.id as id_microfone,
  g.name AS microfone,
  a.date AS data,
  a.hbegin AS inicio,
  a.hend AS fim
FROM
reserves a,
users b,    
romms c,    
projectors d,
laptops e,
sounds f,
microphones g
  
WHERE a.id_user = b.id
AND a.id_romm = c.id 
AND a.id_proj = d.id 
AND a.id_not = e.id 
AND a.id_sound = f.id 
AND a.id_mic = g.id


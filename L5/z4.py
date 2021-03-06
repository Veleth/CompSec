import socket

class DNSQuery:
  def __init__(self, data):
    self.data=data
    self.dominio=''

    tipo = (ord(data[2]) >> 3) & 15   
    if tipo == 0:                     
      ini=12
      lon=ord(data[ini])
      while lon != 0:
        self.dominio+=data[ini+1:ini+lon+1]+'.'
        ini+=lon+1
        lon=ord(data[ini])

  def respuesta(self, ip):
    packet=''
    if self.dominio:
      packet+=self.data[:2] + "\x81\x80"
      packet+=self.data[4:6] + self.data[4:6] + '\x00\x00\x00\x00'   
      packet+=self.data[12:]                                         
      packet+='\xc0\x0c'                                             
      packet+='\x00\x01\x00\x01\x00\x00\x00\x3c\x00\x04'            
      packet+=str.join('',map(lambda x: chr(int(x)), ip.split('.'))) 
    return packet

if __name__ == '__main__':
  ip='192.168.1.1'
  print 'pyminifakeDNS:: dom.query. 60 IN A %s' % ip
  
  udps = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
  udps.bind(('',53))
  
  try:
    while 1:
      data, addr = udps.recvfrom(1024)
      p=DNSQuery(data)
      udps.sendto(p.respuesta(ip), addr)
      print 'Respuesta: %s -> %s' % (p.dominio, ip)
  except KeyboardInterrupt:
    print 'Interrupted'
    udps.close()

#http://code.activestate.com/recipes/491264-mini-fake-dns-server/?fbclid=IwAR0AKmh5yyHtvimOQOd5zm6Ut0Il5dzUR7zik4VYRWEXi5xU9Elqv170P3Q

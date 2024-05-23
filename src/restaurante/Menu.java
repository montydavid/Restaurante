
package restaurante;

import javax.swing.JOptionPane;
public class Menu extends javax.swing.JFrame {

    String dias[];
    Platos platos[];
    int totalp;
    
    double datos[][];
    double [] ventaDiaria;
    
    int p,d;
    public Menu() {
        initComponents();
        p=0;
        d=0;
        totalp=0;
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        configuracion = new javax.swing.JButton();
        cargar = new javax.swing.JButton();
        total = new javax.swing.JButton();
        diaMasVendido = new javax.swing.JButton();
        diaMenosVendido = new javax.swing.JButton();
        productoMasVendido = new javax.swing.JButton();
        promedio = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jLabel1.setText("Analitica de datos tu Restaurante");

        configuracion.setText("Configuracion");
        configuracion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                configuracionActionPerformed(evt);
            }
        });

        cargar.setText("Cargar datos");
        cargar.setEnabled(false);
        cargar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cargarActionPerformed(evt);
            }
        });

        total.setText("Total  de productos vendidos");
        total.setEnabled(false);
        total.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                totalActionPerformed(evt);
            }
        });

        diaMasVendido.setText("Dia de la semana que mas vendio");
        diaMasVendido.setEnabled(false);
        diaMasVendido.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                diaMasVendidoActionPerformed(evt);
            }
        });

        diaMenosVendido.setText("Dia de la semana que menos vendio");
        diaMenosVendido.setEnabled(false);
        diaMenosVendido.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                diaMenosVendidoActionPerformed(evt);
            }
        });

        productoMasVendido.setText("Producto mas vendido");
        productoMasVendido.setEnabled(false);
        productoMasVendido.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                productoMasVendidoActionPerformed(evt);
            }
        });

        promedio.setText("Promedio de ventas");
        promedio.setEnabled(false);
        promedio.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                promedioActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jLabel1)
                .addGap(172, 172, 172))
            .addGroup(layout.createSequentialGroup()
                .addGap(20, 20, 20)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(configuracion)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 36, Short.MAX_VALUE)
                        .addComponent(cargar)
                        .addGap(44, 44, 44)
                        .addComponent(total)
                        .addGap(43, 43, 43))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(diaMasVendido)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(diaMenosVendido)
                        .addGap(23, 23, 23))))
            .addGroup(layout.createSequentialGroup()
                .addGap(54, 54, 54)
                .addComponent(productoMasVendido)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(promedio)
                .addGap(67, 67, 67))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jLabel1)
                .addGap(35, 35, 35)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(configuracion)
                    .addComponent(cargar)
                    .addComponent(total))
                .addGap(52, 52, 52)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(diaMasVendido)
                    .addComponent(diaMenosVendido))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(productoMasVendido)
                    .addComponent(promedio))
                .addContainerGap(110, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void configuracionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_configuracionActionPerformed
        d= Integer.parseInt(JOptionPane.showInputDialog("Diga los dias laborales"));
        dias = new String[d];
        
        for(int i=0; i<d;i++){
            dias[i]= JOptionPane.showInputDialog("Diga el nombre del dia");
        }
        
        p= Integer.parseInt(JOptionPane.showInputDialog("Diga cuantos platos hay en su negocio"));
        platos = new Platos[p];
        
        for(int i=0; i<p;i++){
            platos[i]= new Platos(JOptionPane.showInputDialog("diga el plato numero: " + (i+1)),Double.parseDouble(JOptionPane.showInputDialog("Diga el precio de produccion")) , Double.parseDouble(JOptionPane.showInputDialog("Diga el precio de venta")));
        }
        
        JOptionPane.showMessageDialog(rootPane, "Restaurante configurado");
        configuracion.setEnabled(false);
        cargar.setEnabled(true);
    }//GEN-LAST:event_configuracionActionPerformed

    private void cargarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cargarActionPerformed
        datos = new double[d][p];
        double venta = 0;
        for(int i=0;i<d;i++){
            for(int k=0;k<p;k++){
                venta = Integer.parseInt(JOptionPane.showInputDialog("Cantidad vendida del plato " + platos[k].getNombre() + " el dia " + dias[i]));
                venta = venta*platos[k].getPrecioVenta();
                datos[i][k] = venta;
            }
        }
        total.setEnabled(true);
        diaMasVendido.setEnabled(true);
        productoMasVendido.setEnabled(true);
    }//GEN-LAST:event_cargarActionPerformed

    private void totalActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_totalActionPerformed
        for(int i=0;i<d;i++){
            for(int k=0;k<p;k++){
                totalp += datos[i][k];
            }    
        }
        
        JOptionPane.showMessageDialog(rootPane, "su venta total es: " + totalp);
        promedio.setEnabled(true);
        
    }//GEN-LAST:event_totalActionPerformed

    private void diaMasVendidoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_diaMasVendidoActionPerformed
        double diaMasVendido = 0;
        ventaDiaria = new double[d];
        for(int i=0;i<d;i++){
            for(int k=0;k<p;k++){
                ventaDiaria [i] += datos [i][k];
            }
            if(diaMasVendido<ventaDiaria[i]){
                     diaMasVendido = ventaDiaria[i];
            }
        }
        for(int i=0;i<d;i++){
            if(diaMasVendido==ventaDiaria[i]){
                     JOptionPane.showMessageDialog(rootPane, "El dia que mas se vendio fue el " + dias[i]);
            }    
        }
        diaMenosVendido.setEnabled(true);
        
    }//GEN-LAST:event_diaMasVendidoActionPerformed

    private void diaMenosVendidoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_diaMenosVendidoActionPerformed
        double diaMenosVendido = ventaDiaria[0];
        for(int i=0;i<d;i++){
            if(diaMenosVendido>ventaDiaria[i]){
                     diaMenosVendido = ventaDiaria[i];
            }
        }
        for(int i=0;i<d;i++){
            if(diaMenosVendido==ventaDiaria[i]){
                     JOptionPane.showMessageDialog(rootPane, "El dia que menos se vendio fue el " + dias[i]);
            }    
        }
    }//GEN-LAST:event_diaMenosVendidoActionPerformed

    private void productoMasVendidoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_productoMasVendidoActionPerformed
        double diaMenosVendido = 0;
        double diaMasVendido = 0;
        double productoMasVendido = 0;
        double [] producto = new double[p];
        double ganancia = 0;
        
        for(int i=0;i<d;i++){
            
            for(int k=0;k<p;k++){
                 producto [k] += datos[i][k];
            }    
        }
        
        for(int k=0;k<p;k++){
             if(productoMasVendido<producto[k]){
                 productoMasVendido = producto[k];
             }    
        } 
        for(int k=0;k<p;k++){
             if(productoMasVendido==producto[k]){
                 JOptionPane.showMessageDialog(rootPane, "El producto mas vendido es: " + platos[k].getNombre());
                 for(int i=0;i<d;i++){
                     if(diaMasVendido<datos[i][k]){
                     diaMasVendido = datos[i][k];
                     }
                 }
                 for(int i=0;i<d;i++){
                     if(diaMasVendido==datos[i][k]){
                     JOptionPane.showMessageDialog(rootPane, "El dia que mas se vendio el plato " + platos[k].getNombre() + " fue el dia " + dias[i]);
                     }
                 }
                 diaMenosVendido=datos[0][k];
                 for(int i=0;i<d;i++){
                    if(diaMenosVendido>datos[i][k]){
                     diaMenosVendido = datos[i][k];
                    } 
                 }
                 for(int i=0;i<d;i++){
                    if(diaMenosVendido==datos[i][k]){
                     JOptionPane.showMessageDialog(rootPane, "El dia que menos se vendio el plato " + platos[k].getNombre() + " fue el dia " + dias[i]);
                    }
                 }
                 
                 ganancia = producto[k] -  platos[k].getPrecioProduccion()* (producto[k]/platos[k].getPrecioVenta());
                 
                 JOptionPane.showMessageDialog(rootPane, "la ganacia del plato " + platos[k].getNombre() + " es de: " + ganancia);
             }    
        } 
    }//GEN-LAST:event_productoMasVendidoActionPerformed

    private void promedioActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_promedioActionPerformed
        double promedio = 0;
        promedio = totalp/p;
        JOptionPane.showMessageDialog(rootPane, "El promedio de venta de los productos es de " + promedio);
         
    }//GEN-LAST:event_promedioActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Menu.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Menu.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Menu.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Menu.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Menu().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton cargar;
    private javax.swing.JButton configuracion;
    private javax.swing.JButton diaMasVendido;
    private javax.swing.JButton diaMenosVendido;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JButton productoMasVendido;
    private javax.swing.JButton promedio;
    private javax.swing.JButton total;
    // End of variables declaration//GEN-END:variables
}
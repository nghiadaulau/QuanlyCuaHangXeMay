using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QuanLyCuaHangXeMay
{
    public partial class frmManager : Form
    {
        public frmManager()
        {
            InitializeComponent();
        }

        private void quảnLýNhânViênToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmNhanvien f = new frmNhanvien();
            f.ShowDialog();
        }

        private void quảnLýXeToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmXe f = new frmXe();
            f.ShowDialog();
        }

        private void quảnLýNhàCungCấpToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmNhacungcap f = new frmNhacungcap();
            f.ShowDialog();
        }

        private void quảnLýKháchHàngToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmKhachhang f = new frmKhachhang();
            f.ShowDialog();
        }
    }
}

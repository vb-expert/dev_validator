﻿using System;
using System.Windows.Forms;

namespace WindowsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        { InitializeComponent(); }

        private void btn_ChangeText_Click(object sender, EventArgs e)
        {
            btn_ChangeText.Text = "Test";
        }

        private void checkBox1_CheckedChanged(object sender, EventArgs e)
        {
            btn_ChangeText.Text = "Test";
        }

        private void checkBox1_Click(object sender, EventArgs e)
        {
            btn_ChangeText.Text = "Test";
        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {

        }
    }
}

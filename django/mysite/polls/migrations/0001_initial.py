# -*- coding: utf-8 -*-
# Generated by Django 1.10.4 on 2016-12-02 12:44
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Guest',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('age', models.CharField(max_length=10)),
                ('gender', models.CharField(max_length=10)),
                ('email', models.CharField(max_length=100)),
            ],
        ),
    ]

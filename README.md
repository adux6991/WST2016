Prerequisite

  export TOP=/home/RV32B/LL1400012989/RV32B
  export RISCV=$TOP/riscv
  export PATH=$PATH:$RISCV/bin

Usage

- User Mode

  `make run-user` 
  
- System Mode

  `make run-system`

  After a while you will see a linux kernel configuration interface. You should modify the following items:
    * Change Platform type ­> CPU selection from `Rocket` to `Generic RISC­V`
    * Change Kernel type ­> Kernel code model from `64­bit kernel` to `32­bit kernel`
    * Change General setup ­> Cross­compiler tool prefix from `riscv64­unknown­linux­gnu­` to `riscv32­unknown­linux­gnu­`
  
  Then exit and save.

  And you will finally see errors like "Invalid htif register address 0000000000000034". This is where we have got so far.

  Our modification to linux kernel code can be found in following links:
  https://github.com/riscv/riscv-linux/commit/d47ccdce841df25b64424350eb200fc5df222148
  https://github.com/riscv/riscv-linux/commit/cf441b3721c0b781fedcbfedafc5724d7583dd96

  Credit to a RISCV Google Group member:
  https://groups.google.com/a/groups.riscv.org/forum/#!topic/sw-dev/o_zmyrpsTdo

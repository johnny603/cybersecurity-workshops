FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive

# Install required software
RUN apt-get update && \
    apt-get install -y \
        openssh-server \
        vsftpd \
        python3 \
    && rm -rf /var/lib/apt/lists/*

# Create groups and user
RUN groupadd -f ssh && \
    groupadd -f ftp && \
    useradd -m -s /bin/bash student && \
    usermod -aG ssh,ftp student && \
    echo "student:broke" | chpasswd
    
# Prevent student from logging into FTP
RUN echo "student" > /etc/vsftpd.user_list

# Create FTP-only user
RUN useradd -m -s /bin/bash ftpuser && \
    usermod -aG ftp ftpuser && \
    echo "ftpuser:millionaire" | chpasswd

# SSH configuration
RUN mkdir -p /run/sshd && \
    sed -i 's/^#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config && \
    sed -i 's/^PasswordAuthentication no/PasswordAuthentication yes/' /etc/ssh/sshd_config && \
    echo "DenyUsers ftpuser" >> /etc/ssh/sshd_config

# FTP configuration
RUN cat >> /etc/vsftpd.conf <<'EOF'
local_enable=YES
write_enable=YES
chroot_local_user=YES
local_root=/home/student/data
pasv_enable=YES
pasv_min_port=21000
pasv_max_port=21010
# User restrictions
userlist_enable=YES
userlist_deny=YES
userlist_file=/etc/vsftpd.user_list
EOF

RUN sed -i 's/#force_color_prompt=yes/force_color_prompt=yes/' /etc/bash.bashrc \
    && echo "alias ls='ls --color=auto'" >> /etc/bash.bashrc \
    && echo "alias grep='grep --color=auto'" >> /etc/bash.bashrc \
    && echo "alias ll='ls -alF --color=auto'" >> /etc/bash.bashrc

WORKDIR /home/student

EXPOSE 22 21 21000-21010 8000

CMD service ssh start && \
    service vsftpd start && \
    su - student -c "python3 -m http.server 8000 --directory /home/student" & \
    wait
